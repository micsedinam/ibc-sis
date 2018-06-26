function validate(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode( key );
    var regex = /[0-9]|\./;
    if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }
  
function validateDate(date){
    var fourteenYearsAgo = moment().subtract(14, "years");
    /*var dobi = document.forms["myForm"]["fname"].value;*/
    var dob = moment(date);

    if (!dob.isValid()) {
        return "invalid date";
    }
    else if (fourteenYearsAgo.isAfter(birthday)) {
        return true;
    }
    else {
        return false;
    }
}

//jsprint(validateDate);
