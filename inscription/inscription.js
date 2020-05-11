  var ResultatGenre = 0;// 0 = pas choisi/ 1= male/2=female

function SelectGender(genre_select)
{
  var boutonHomme = document.getElementById("Select_homme");
  var boutonFemme = document.getElementById("Select_femme");

  if (genre_select == 'male')
  {
    ResultatGenre = 1;
    


    boutonHomme.style.color = "white";
    boutonHomme.style.backgroundColor = "rgba(54,191,231,0.3)";
    //remettre l'autre bouton a la normale
    boutonFemme.style.color = "#8d8d8d";
    boutonFemme.style.backgroundColor = "white";
  }

if (genre_select == 'female')
  {
    ResultatGenre = 2;
    boutonFemme.style.color = "white";
    boutonFemme.style.backgroundColor = "rgba(227,81,239,0.3)";

     //remettre l'autre bouton a la normale
    boutonHomme.style.color = "#8d8d8d";
    boutonHomme.style.backgroundColor = "white";
  }

console.log(ResultatGenre);
}
/*var mondiv = document.createElement("p");
mondiv.innerHTML = "genre= "+genre_select;
var currentDiv = document.getElementById("ResultatGenre");
currentDiv.appendChild(mondiv);*/