

const lastModified = document.lastModified;
document.getElementById("lastmod").innerHTML = lastModified;


document.getElementById("pagelocation").innerHTML = location.pathname;




// Hero converter
const convertTokg = (pound) => (0.4536 * pound) + " kilograms"
const convertTolb = (kg) => (2.2046 * kg) + " pounds"


convertBtn = document.getElementById("convert_btn");
convertBtn.addEventListener("click",()=>{
    convertValue = document.getElementById("convert_value").value;
    convertOption = document.getElementById("convert_option").value;
    convertResult = document.getElementById("convert_result");
    convertedValue = (convertOption==="1")?convertTokg(convertValue):convertTolb(convertValue)
    convertResult.innerHTML = convertedValue;
    

})