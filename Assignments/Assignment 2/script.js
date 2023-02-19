const lastModified = document.lastModified;
document.getElementById("lastmod").innerHTML = lastModified;


document.getElementById("pagelocation").innerHTML = location.pathname;



function fetchQuote() {
    var quotes = ["If you wish to be a writer, write.", 
    "When you learn, teach. When you get, give.",
    "Nothing will work unless you do.",
    "You're never a loser until you quit trying.", 
    "To lead people walk behind them.",
    "Our intention creates our reality.",
    "All know the way; few actually walk it.",
    "He who angers you conquers you.",
    "Imagination rules the world.",
    "Never promise more than you can perform."    
    ];
    var quotes_author = ["Epictetus", "Maya Angelou", "Maya Angelou", "Mike Ditka", "Laozi", "Wayne Dyer", "Bodhidharma","Elizabeth Kenny", "Napoleon", "Publilius Syrus"];

    var random_quote = Math.floor(Math.random() * quotes.length);
    document.getElementById("quote_text").innerHTML = '"' + quotes[random_quote] + '"';
    document.getElementById("quote_author").innerHTML = quotes_author[random_quote];

    document.getElementById("quotes").style.backgroundColor = "#22c2b4";
    document.getElementById("quotes").style.borderColor = "#5d767b";
    document.getElementById("quote_text").style.color = "#fff";
    document.getElementById("quote_author").style.color = "#fff";
    document.getElementById("quote_icon").style.color = "#fff";
    document.getElementById("quote_text").style.fontFamily = "Amiri";
    document.getElementById("quote_text").style.fontWeight = "serif";        
}
fetchQuote();

// Creating buttons to change color

function red() {
    console.log("Clicked Red")
    document.getElementById("quotes").style.backgroundColor = "#EE6D78";
    document.getElementById("quotes").style.borderColor = "#1d3557";
    document.getElementById("quote_text").style.color = "#ffe3e0";
    document.getElementById("quote_author").style.color = "#ffe3e0";
    document.getElementById("quote_icon").style.color = "#ffe3e0";
    document.getElementById("quote_text").style.fontFamily = "Lobster";
    document.getElementById("quote_text").style.fontWeight = "cursive";
}
function blue() {
    console.log("Clicked Blue")
    document.getElementById("quotes").style.backgroundColor = "#778DA9";
    document.getElementById("quotes").style.borderColor = "#7400b8";
    document.getElementById("quote_text").style.color = "#80ffdb";
    document.getElementById("quote_author").style.color = "#80ffdb";
    document.getElementById("quote_icon").style.color = "#80ffdb";
    document.getElementById("quote_text").style.fontFamily = "Montserrat";
    document.getElementById("quote_text").style.fontWeight = "sans-serif";
}
function yellow() {
    console.log("Clicked Blue")
    document.getElementById("quotes").style.backgroundColor = "#f9dc5c";
    document.getElementById("quotes").style.borderColor = "#003566";
    document.getElementById("quote_text").style.color = "#001d3d";
    document.getElementById("quote_author").style.color = "#001d3d";
    document.getElementById("quote_icon").style.color = "#001d3d";
    document.getElementById("quote_text").style.fontFamily = "Tiro Tamil";
    document.getElementById("quote_text").style.fontWeight = "serif";
}
function pink() {
    console.log("Clicked Blue")
    document.getElementById("quotes").style.backgroundColor = "#ea9ab2";
    document.getElementById("quotes").style.borderColor = "#47126b";
    document.getElementById("quote_text").style.color = "#9e0059";
    document.getElementById("quote_author").style.color = "#9e0059";
    document.getElementById("quote_icon").style.color = "#9e0059";
    document.getElementById("quote_text").style.fontFamily = "Ubuntu";
    document.getElementById("quote_text").style.fontWeight = "sans-serif";
}
const converterinput = document.getElementById("converter_input");
converterinput.addEventListener("keyup", function(event) {
    if (event.key === 'Enter') {
        convert();
    }
});
function convert(){
    var input = document.getElementById("converter_input").value;
    // console.log(input);
    var unit = document.getElementById("converter_unit").value;
    // console.log(unit);
    if (unit == "lbtokg"){
        var output = input * 0.45359;
        document.getElementById("converter_result").innerHTML = output + " KG";
    }
    else{
        var output = input * 2.20462;
        document.getElementById("converter_result").innerHTML = output + " LB";
    }
}

// Calculator

const calculatorinput = document.getElementById("calc-value");
function calc() {
    var calcvalue = document.getElementById("calc-value").value;
    calcvalue = calcvalue.replace(/\s+/g, '')
    calculateArray = calcvalue.split(',');
    calculateArray = calculateArray.filter(n => n);
    Max();
    Min();
    Sum();
    Reverse();
    setTimeout(calc, 100);
}
function Max() {
    var maxvalue = Math.max.apply(null, calculateArray);
    if (maxvalue == "-Infinity"){
        maxvalue = 0;
    }
    document.getElementById("max").innerHTML = maxvalue;
}
function Min() {
    var minvalue = Math.min.apply(null, calculateArray);
    if (minvalue == "Infinity"){
        minvalue = 0;
    }
    document.getElementById("min").innerHTML = minvalue;
}
function Sum() {
    var sum = 0;
    for (var i = 0; i < calculateArray.length; i++) {
        sum += parseFloat(calculateArray[i]);
    }
    document.getElementById("sum").innerHTML = sum;
    var average = sum / calculateArray.length;
    if (isNaN(average) === true){
        average = 0;
    }
    document.getElementById("average").innerHTML = average;
}
function Reverse() {
    calculateArray.reverse();
    for (var i = 0; i < calculateArray.length; i++) {
        calculateArray[i] = ` ${calculateArray[i]}`;
    }
    document.getElementById("reverse").innerHTML = calculateArray;
}

// magic

function cleartext() {
    document.getElementById("magic-input").value = "";
    console.log("Cleared Magic TextArea")
}
function capitalizetext() {
    var magicinput = document.getElementById("magic-input").value;
    if (document.getElementById("capitalize-button").value == "NO"){
        document.getElementById("magic-input").value = magicinput.toUpperCase();
        document.getElementById("capitalize-button").value = "YES";
        console.log("Converted to Uppercase characters!")
    }
    else{
        document.getElementById("magic-input").value = magicinput.toLowerCase();
        document.getElementById("capitalize-button").value = "NO";
        console.log("Converted to Lowercase characters!")
    }
}

function sortLines() {
    var magicinput = document.getElementById("magic-input").value;
    var magicArray = magicinput.split("\n");
    var newmagicinput = "";
    magicArray.sort();
    for (var i = 0; i < magicArray.length; i++) {
        if(i == magicArray.length-1){
            newmagicinput += magicArray[i];
        }
        else{
            newmagicinput += magicArray[i]+"\n";
        }
        // debugger
    }
    document.getElementById("magic-input").value = newmagicinput;
    console.log("Sorted Lines!")
}
function reverseLines() {
    var magicinput = document.getElementById("magic-input").value;
    var magicArray = magicinput.split("\n");
    var newmagicinput = "";
    magicArray.reverse();
    for (var i = 0; i < magicArray.length; i++) {
        if(i == magicArray.length-1){
            newmagicinput += magicArray[i];
        }
        else{
            newmagicinput += magicArray[i]+"\n";
        }
    }
    document.getElementById("magic-input").value = newmagicinput;
    console.log("Reversed Lines!")
}
function stripBlank(){
    var magicinput = document.getElementById("magic-input").value;
    var magicArray = magicinput.split("\n");
    var newmagicinput = "";
    var newmagicarray = []
    // Remove the front spaces of any lines
    magicArray.forEach((magicline) => {
        if (magicline === ""){ 
            return
        }
        newmagicinput += magicline.trim() + "\n";
    })

    // magicArray = magicArray.filter(item => item);
    // for (var i = 0; i < magicArray.length; i++) {
    //     if(i == magicArray.length-1){
    //         newmagicinput += magicArray[i];
    //     }
    //     else{
    //         newmagicinput += magicArray[i]+"\n";
    //     }
    // }
    document.getElementById("magic-input").value = newmagicinput;
    console.log("Stripped Blank Lines!")
}
function addLineNo(){
    var magicinput = document.getElementById("magic-input").value;
    var magicArray = magicinput.split("\n");
    var newmagicinput = "";
    for (var i = 0; i < magicArray.length; i++) {
        if(i == magicArray.length-1){
            newmagicinput += (i+1) + ") " + magicArray[i];
        }
        else{
            newmagicinput += (i+1) + ") " + magicArray[i] + "\n";
        }
    }
    document.getElementById("magic-input").value = newmagicinput;
    console.log("Added Line Numbers!")
}
function shuffleLines(){
    var magicinput = document.getElementById("magic-input").value;
    var magicArray = magicinput.split("\n");
    var newmagicinput = "";
    magicArray.sort(function(a, b){return 0.5 - Math.random()});
    for (var i = 0; i < magicArray.length; i++) {
        if(i == magicArray.length-1){
            newmagicinput += magicArray[i];
        }
        else{
            newmagicinput += magicArray[i]+"\n";
        }
    }
    document.getElementById("magic-input").value = newmagicinput;
    console.log("Shuffled Lines!")
}