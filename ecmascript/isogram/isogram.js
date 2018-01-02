class Isogram {
    constructor(word) {
        this.word = word.replace(/[\s-]/g, '').toLocaleLowerCase();
        this._isIsogram = (new Set(this.word).size == this.word.length);
    }

    isIsogram() {
        return this._isIsogram;
    }
}

export default Isogram;
