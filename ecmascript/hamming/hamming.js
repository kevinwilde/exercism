class Hamming {
    compute(str1, str2) {
        if (str1.length !== str2.length) {
            throw new Error('DNA strands must be of equal length.');
        }
        return str1.split('').filter((char, i) => char !== str2[i]).length;
    }
}

export default Hamming;
