class Binary {
    constructor(val) {
        this.val = val;
    }

    toDecimal() {
        let decimal = 0;
        for (const [i, digit] of this.val.split('').reverse().entries()) {
            if (!['0', '1'].includes(digit)) {
                return 0;
            }
            decimal += digit * 2 ** i;
        }
        return decimal;
    }
}

export default Binary;
