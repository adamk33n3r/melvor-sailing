export enum LogLevel {
  Debug,
  Info,
  Warning,
  Error,
}

export class Logger {
  private _level: LogLevel = LogLevel.Warning;
  constructor(public name: string) {}

  public getLevel() {
    return this._level;
  }

  public setLevel(level: LogLevel) {
    this._level = level;
  }

  public debug(...message: any[]) {
    this.log(LogLevel.Debug, ...message);
  }

  public info(...message: any[]) {
    this.log(LogLevel.Info, ...message);
  }

  public warn(...message: any[]) {
    this.log(LogLevel.Warning, ...message);
  }

  public error(...message: any[]) {
    this.log(LogLevel.Error, ...message);
  }

  public log(level: LogLevel, ...message: any[]) {
    switch (level) {
      case LogLevel.Debug:
        if (this._level < LogLevel.Debug) return;
        break;
      case LogLevel.Info:
        if (this._level < LogLevel.Info) return;
        break;
      case LogLevel.Warning:
        if (this._level < LogLevel.Warning) return;
        break;
      case LogLevel.Error:
        if (this._level < LogLevel.Error) return;
        break;
    }
    console.log(`[${this.name}]`, ...message);
  }
}
