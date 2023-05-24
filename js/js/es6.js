class StringSeeder {
    constructor() {
        this.stringList = [];
    }

    wait(ms) {
        const start = Date.now();
        let now = start;
        while (now - start < ms) {
            now = Date.now()
        }
    }

    init() {
        this.wait(1000);

        for(let x = 0; x < 500; x++) {
            this.stringList.push(Math.random().toString(36).substring(2));
        }

        this.wait(1000);

        return this;
    }

    get() {
        return this.stringList;
    }
}