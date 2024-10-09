const fs = require('fs');
const path = require('path');
const archiver = require('archiver');
const del = import('del');

const pkg = require('../package.json');
const meta = require('../metadata.json');

const dir = 'package';
if (!fs.existsSync(dir)) fs.mkdirSync(dir);

const t = Date.now();
const outname = `${pkg.name}-v${pkg.version}-${t}.zip`;
const output = fs.createWriteStream(path.resolve(dir, outname));
const archive = archiver('zip');

output.on('close', () => {
  console.log(outname + ': ' + archive.pointer() + ' total bytes');
  // del.then(({ deleteSync }) => {
  //   deleteSync('dist');
  //   fs.readdir(dir, (err, files) => {
  //     if (err) {
  //       console.log(err);
  //     }

  //     files.forEach((file) => {
  //       if (file !== outname) {
  //         deleteSync(path.join(dir, file));
  //       }
  //     });
  //   });
  // });
});

archive.on('error', (err) => {
  throw err;
});

archive.pipe(output);
archive.directory('dist/', false);
archive.finalize().then(() => {
  console.log('Writing to metadata');
  meta.zipfile = outname;
  meta.version = pkg.version;
  fs.writeFileSync(
    path.resolve(dir, '../metadata.json'),
    JSON.stringify(meta, null, 2),
    (err) => console.error('problem writing metadata', err)
  );
});
