const btn = document.getElementById('btn')

const body = document.getElementById('body')

const color = document.getElementById('color')


btn.addEventListener('click', () => 
{

    //making the color picker visible

    color.style.visibility = 'visible'

})

//Event when the color will be changed by user

color.addEventListener('change', () => 
{


    body.style.backgroundColor = color.value

    btn.style.color = color.value

})

function myFunction() 
{

    var x = Math.floor(Math.random() * 256);

    var y = Math.floor(Math.random() * 256);

    var z = Math.floor(Math.random() * 256);

    var bgColor = "rgb(" + x + "," + y + "," + z + ")";

    

    document.body.style.background = bgColor;

}

myFunction();
