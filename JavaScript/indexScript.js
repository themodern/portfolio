window.addEventListener("load", loadItems());

function loadItems(){
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            let json  = this.responseText;
            retriveData(json);
        }
    };
    // AJAX request
    xhr.open("GET", "JavaScript/cars.json", true);
    xhr.send();
}


function retriveData(json){
    let list = JSON.parse(json);
    let cars = list;
    let component = " ";

    for (let i = 0; i < cars.length; i++){
        let model = cars[i]['Model'];
        let brand = cars[i]['Brand'];
        let availability = cars[i]['Availability'];
        let name = cars[i]['Brand'] + "-" + cars[i]['Model'] + "-" + cars[i]['ModelYear'];
        let mileage = cars[i]['Mileage'];
        let fuelType = cars[i]['FuelType'];
        let seats = cars[i]['Seats'];
        let price = cars[i]['Price_per_day'];
        let description = cars[i]['Description'];
        let pic = brand + "_" + model;
        let carID = cars[i]['carID'];
        component += "<div class = 'item'>";
        component += "<ul'>";
        component += "<img src = './carImages/" + brand + "_" + model + ".jpeg' alt = 'car image'>";
        component += "<h5>" + name + "</h5>";
        component += "<p> Mileage: " + mileage + "</p>";
        component += "<p> Fuel Type: " + fuelType + "</p>";
        component += "<p> Seats: " + seats + "</p>";
        component += "<p> Price per day: " + price + "</li>";
        component += "<p> Availability: " + availability + "</p>";
        component += "<p> Description: " + description + "</p>";
        component += "<button class = 'btn btn-success' onClick = \"sendData('" + carID + "','" + pic + "','" + name + "','" + price + "','" + availability  + "')\" > Add to cart </button>";
        component += "</ul>";
        component += "</div>";
    }
    document.getElementById("cards_Car").innerHTML = component;
}


