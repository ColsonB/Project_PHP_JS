function range(){

    var slider = document.getElementById("range");
    var output = document.getElementById("value");
    var output2 = document.getElementById("value2");
    var output3 = document.getElementById("value3");

    output.innerHTML = slider.value;
    output2.innerHTML = Number(slider.value)+50;
    output3.innerHTML = 5-Number(slider.value);

    slider.oninput = function(){
                output.innerHTML = this.value;
                output2.innerHTML = Number(this.value)+50;
                output3.innerHTML = 5-Number(slider.value);
                slider.setAttribute('value', this.value);
                    if(output3.innerHTML<=0){
                        slider.disabled = true;
                    }
    }

}

function range2(){

    var slider = document.getElementById("range2");
    var output = document.getElementById("value4");
    var output2 = document.getElementById("value5");
    var output3 = document.getElementById("value6");

    output.innerHTML = slider.value;
    output2.innerHTML = Number(slider.value)+50;
    output3.innerHTML = 5-Number(slider.value);

    slider.oninput = function(){
                output.innerHTML = this.value;
                output2.innerHTML = Number(this.value)+50;
                output3.innerHTML = 5-Number(slider.value);
                slider.setAttribute('value', this.value);
                    if(output3.innerHTML<=0){
                        slider.disabled = true;
                    }
    }

}

function range3(){

    var slider = document.getElementById("range3");
    var output = document.getElementById("value7");
    var output2 = document.getElementById("value8");
    var output3 = document.getElementById("value9");

    output.innerHTML = slider.value;
    output2.innerHTML = Number(slider.value)+50;
    output3.innerHTML = 5-Number(slider.value);

    slider.oninput = function(){
                output.innerHTML = this.value;
                output2.innerHTML = Number(this.value)+50;
                output3.innerHTML = 5-Number(slider.value);
                slider.setAttribute('value', this.value);
                    if(output3.innerHTML<=0){
                        slider.disabled = true;
                    }
    }

}


