function priceCalculation() {
  var cc = document.getElementById('ccfield').value;
  var age = document.getElementById('agefield').value;
  var days = document.getElementById('daysfield').value;
  let ageIns;
  let ccType;
  let daysType;

  function rentalCalc(daysType, ccType){
    var dailyCost;
    switch (true) {
      case daysType==1 && ccType==1:
        dailyCost = 15.42;
        break;

      case daysType==1 && ccType==2:
        dailyCost = 16.82;
        break;

      case daysType==1 && ccType==3:
        dailyCost = 18.22;
        break;

      case daysType==2 && ccType==1:
        dailyCost = 14.62;
        break;

      case daysType==2 && ccType==2:
        dailyCost = 15.76;
        break;

      case daysType==2 && ccType==3:
        dailyCost = 17.10;
        break;

      case daysType==3 && ccType==1:
        dailyCost = 13.15;
        break;

      case daysType==3 && ccType==2:
        dailyCost = 14.80;
        break;

      case daysType==3 && ccType==3:
        dailyCost = 16.20;
        break;
      default:
        break;
    }
    return dailyCost;
  }

//Figuring the ageIns
  if(age < 18) {
    alert("Must be older than 18");
    return null;
  }

  if(age >= 18 && age < 22){
    ageIns = 0.00042;
  }
  else if(age >= 22 && age <= 30) {
    ageIns = 0.00036;
  }

  else if(age > 30) {
    ageIns = 0.00023;
  }
  else{
    alert("Invalid age");
    return null;
  }
//Figuring the ccType
  if(cc > 0 && cc <= 1600){
    ccType = 1;
  }
  else if(cc > 1600 && cc <= 2000) {
    ccType = 2;
  }

  else if(cc > 2000) {
    ccType = 3;
  }
  else{
    alert("Invalid cc");
    return null;
  }
  //Figuring the dayType
  if(days > 0 && days <= 5){
    daysType = 1;
  }
  else if(days > 6 && days <= 10) {
    daysType = 2;
  }

  else if(days > 10) {
    daysType = 3;
  }
  else{
    alert("Invalid days");
    return null;
  }
  var insuranceCost = age*ageIns*cc;
  var rentalCost = days*rentalCalc(daysType, ccType);
  var finalCost = Math.round(insuranceCost) + Math.round(rentalCost);
  document.getElementById('cost').value = finalCost + " euros";
}
