function validate(){

    var naslov = document.getElementById("naslov").value;
    var naslovPolje = document.getElementById("naslov");

    if(naslov.length < 5 || naslov.length  > 30){
        naslovPolje.style.border = "1px dashed red";
        document.getElementById("poruka_naslov").innerHTML = "Naslov mora imati 5 do 30 znakova";
        return false;
    }else{
        naslovPolje.style.border = "1px solid green";
        document.getElementById("poruka_naslov").innerHTML = "";
    }

    var sazetak = document.getElementById("sazetak").value;
    var sazetakPolje = document.getElementById("sazetak");

    if(sazetak.length < 10 || sazetak.length > 100){
        sazetakPolje.style.border = "1px dashed red";
        document.getElementById("poruka_sazetak").innerHTML = "Kratki sadrzaj mora imati 10 do 100 znakova";
        return false;
    }else{
        sazetakPolje.style.border = "1px solid green";
        document.getElementById("poruka_sazetak").innerHTML = "";
    }

    var tekst = document.getElementById("tekst").value;
    var tekstPolje = document.getElementById("tekst");

    if(tekst == null || tekst == ""){
        tekstPolje.style.border = "1px dashed red";
        document.getElementById("poruka_tekst").innerHTML = "Tekst vijesti ne smije biti prazan";
        return false;
    }else{
        tekstPolje.style.border = "1px solid green";
        document.getElementById("poruka_tekst").innerHTML = "";
    }

    var kategorijaPolje = document.getElementById("kategorija");

    if(document.getElementById("kategorija").selectedIndex == 0){
        kategorijaPolje.style.border = "1px dashed red";
        document.getElementById("poruka_kategorija").innerHTML = "Kategorija mora  biti odabrana";
        return false;
    }else{
        kategorijaPolje.style.border = "1px solid green";
        document.getElementById("poruka_kategorija").innerHTML = "";
    }
    
    var slika = document.getElementById("slika").value;
    var slikaPolje = document.getElementById("slika");

    if(document.getElementById("slika").files.length == 0){
        slikaPolje.style.border = "1px dashed red";
        document.getElementById("poruka_slika").innerHTML = "Slia mora biti odabrana";
        return false;
    }else{
        slikaPolje.style.border = "1px solid green";
        document.getElementById("poruka_slika").innerHTML = "";
    }

    
}