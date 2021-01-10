/* const array=[];
console.log(array.length);
var remove= array.splice(0,3);
var casa=['1','2','3'];
var barco=array.push('1','2','3');

barco=array;
barco.splice(0,3);
barco.push('1','2','3')
for (let i = 0; i < barco.length; i++) {
    console.log(barco[i])
  }
  var numbers = [1, 2, 3, 4, 5];
var length = numbers.length;
for (var i = 0; i < length; i++) {
  console.log( numbers[i] *= 2); 
} */

var numbers = [];
setInterval(() => {
  numbers.unshift(10,10,10);
if (numbers.length > 15) {
  numbers.length = 15;
}
console.log(numbers); // [1, 2, 3]
console.log(numbers.length); // 3  
  
}, 5000);




