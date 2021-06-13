let a = 0;
for (let i = 1; i <= 6; i++) {
    for (let j = 1; j <= 7-i; j++) {
        a++;
        console.log(`A[${i}][${j}]: ${a}`);
    }
}