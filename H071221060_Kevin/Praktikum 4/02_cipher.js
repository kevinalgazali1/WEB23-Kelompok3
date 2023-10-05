let karakter = prompt("Masukkan inputan : ").split("");
let geser = parseInt(prompt("angka untuk geser setiap huruf "))

let new_karakter = ""

for (let i of karakter) {
    if (/[a-z]/.test(i)) {
        new_karakter += String.fromCharCode((((i.charCodeAt(0) + geser - 97) % 26) + 97))
    } else if (/[A-Z]/.test(i)) {
        new_karakter += String.fromCharCode((((i.charCodeAt(0) + geser - 65) % 26) + 65))
    } else {
        new_karakter += " "
    }
}

alert(new_karakter);