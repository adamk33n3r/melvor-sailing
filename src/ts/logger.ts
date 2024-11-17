export enum LogLevel {
  Error,
  Warning,
  Info,
  Debug,
}

// eslint-disable-next-line @typescript-eslint/no-empty-function
const noop = function () {};

export class Logger {
  private _level: LogLevel = LogLevel.Warning;
  private _prefix = `[${this.name}]`;
  constructor(private name: string) {
    this.buildLogFunctions();
  }
  
  private buildLogFunctions() {
    this.log = console.log.bind(console) as (...message: unknown[]) => void;
    this.debug = this._level < LogLevel.Debug ? noop : console.log.bind(console, this._prefix) as (...message: unknown[]) => void;
    this.info = this._level < LogLevel.Info ? noop : console.info.bind(console, this._prefix) as (...message: unknown[]) => void;
    this.warn = this._level < LogLevel.Warning ? noop : console.warn.bind(console, this._prefix) as (...message: unknown[]) => void;
    this.error = this._level < LogLevel.Error ? noop : console.error.bind(console, this._prefix) as (...message: unknown[]) => void;
    this.trace = this._level < LogLevel.Error ? noop : console.trace.bind(console, this._prefix) as (...message: unknown[]) => void;
  }

  public getLevel() {
    return this._level;
  }

  public setLevel(level: LogLevel) {
    this._level = level;
    this.buildLogFunctions();
  }

  // eslint-disable-next-line
  public log(...message: unknown[]) {}
  // eslint-disable-next-line
  public debug(...message: unknown[]) {}
  // eslint-disable-next-line
  public info(...message: unknown[]) {}
  // eslint-disable-next-line
  public warn(...message: unknown[]) {}
  // eslint-disable-next-line
  public error(...message: unknown[]) {}
  // eslint-disable-next-line
  public trace(...message: unknown[]) {}
  // public log(level: LogLevel, ...message: unknown[]) {
  //   switch (level) {
  //     case LogLevel.Debug:
  //       if (this._level > LogLevel.Debug) return;
  //       break;
  //     case LogLevel.Info:
  //       if (this._level > LogLevel.Info) return;
  //       break;
  //     case LogLevel.Warning:
  //       if (this._level > LogLevel.Warning) return;
  //       break;
  //     case LogLevel.Error:
  //       if (this._level > LogLevel.Error) return;
  //       break;
  //   }
  //   console.log(`[${this.name}]`, ...message);
  // }
}
