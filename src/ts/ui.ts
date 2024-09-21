import { SailingPage } from '../components/sailing';
import { Sailing } from './sailing';

export class UserInterface {
    public get mainContainer() {
        return document.getElementById('main-container');
    }

    constructor(private ctx: Modding.ModContext, private game: Game, private sailing: Sailing) {
        this.sailing.page = new SailingPage();
        this.ctx.onInterfaceAvailable(() => {
            ui.create(this.sailing.page, this.mainContainer);
        });
        this.ctx.onCharacterLoaded(() => {
            this.sailing.page.update();
        });
    }
}
