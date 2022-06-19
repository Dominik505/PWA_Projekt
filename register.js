function validate(){


    var korisnicko_ime = document.getElementById("korisnicko_ime").value;
    var korisnicko_imePolje = document.getElementById("korisnicko_ime");

    if(korisnicko_ime == null || korisnicko_ime == ""){
        korisnicko_imePolje.style.border = "1px dashed red";
        document.getElementById("poruka_korisnicko_ime").innerHTML = "Korisnicko ime ne smije biti prazno";
        return false;
    }else{
        korisnicko_imePolje.style.border = "1px solid green";
        document.getElementById("poruka_korisnicko_ime").innerHTML = "";
    }


    var ime = document.getElementById("ime").value;
    var imePolje = document.getElementById("ime");

    if(ime = null || ime == ""){
        imePolje.style.border = "1px dashed red";
        document.getElementById("poruka_ime").innerHTML = "Ime ne smije biti prazno";
        return false;
    }else{
        imePolje.style.border = "1px solid green";
        document.getElementById("poruka_ime").innerHTML = "";
    }

    
    var prezime = document.getElementById("prezime").value;
    var prezimePolje = document.getElementById("prezime");

    if(prezime == null || prezime == ""){
        prezimePolje.style.border = "1px dashed red";
        document.getElementById("poruka_prezime").innerHTML = "Prezime ne smije biti prazno";
        return false;
    }else{
        prezimePolje.style.border = "1px solid green";
        document.getElementById("poruka_prezime").innerHTML = "";
    }


    var lozinka = document.getElementById("lozinka").value;
    var lozinkaPolje = document.getElementById("lozinka");
    var ponLozinka = document.getElementById("ponLozinka").value;
    var ponLozinkaPolje = document.getElementById("ponLozinka");

    if(lozinka != ponLozinka || lozinka == "" || ponLozinka == ""){
        lozinkaPolje.style.border = "1px dashed red";
        ponLozinkaPolje.style.border = "1px dashed red";
        document.getElementById("poruka_lozinka").innerHTML = "Lozinke se ne podudaraju!";
        return false;
    }else{
        lozinkaPolje.style.border = "1px solid green";
        ponLozinkaPolje.style.border = "1px solid green";
        document.getElementById("poruka_lozinka").innerHTML = "";
    }
    
   
    
}