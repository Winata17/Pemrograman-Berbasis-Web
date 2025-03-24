const calculator = (operator, num1, num2) => {
    let result;

    switch (operator) {
        case '+':
            result = num1 + num2;
            break;
        case '-':
            result = num1 - num2;
            break;
        case '*':
            result = num1 * num2;
            break;
        case '/':
            if (num2 === 0) return "Error: Tidak bisa dibagi dengan nol!";
            result = num1 / num2;
            break;
        case '%':
            result = num1 % num2;
            break;
        default:
            return "Operator tidak valid!";
    }

    return result;
};

console.log(calculator('+', 5, 12));   
console.log(calculator('-', 20, 15));  
console.log(calculator('*', 2, 8));  
console.log(calculator('/', 20, 4)); 
console.log(calculator('%', 10, 3));  
