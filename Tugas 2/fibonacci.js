const fibonacci = (BanyakAngka) => {
    let angka = [0, 1]; 

    for (let i = 2; i < BanyakAngka; i++) {
        angka[i] = angka[i - 1] + angka[i - 2]; 
    }

    return angka;
};

console.log(fibonacci(15)); 