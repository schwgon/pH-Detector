document.addEventListener('DOMContentLoaded', function() {
    const $d = document;
    const $selectProvinces = $d.getElementById("province");
    const $selectMunicipalities = $d.getElementById("municipality");
    const $selectCity = $d.getElementById("city");

    function loadProvinces() {
        fetch("https://apis.datos.gob.ar/georef/api/provincias")
            .then(res => res.ok ? res.json() : Promise.reject(res))
            .then(json => {
                let $options = '<option value="Elije una provincia">Elije una provincia</option>';
                json.provincias.forEach(el => $options += `<option value="${el.nombre}">${el.nombre}</option>`);
                $selectProvinces.innerHTML = $options;
            })
            .catch(err => console.error('Error fetching provinces:', err));
    }

    function loadMunicipalities(province) {
        fetch(`https://apis.datos.gob.ar/georef/api/municipios?provincia=${province}&campos=id,nombre&max=1000`)
            .then(res => res.ok ? res.json() : Promise.reject(res))
            .then(json => {
                let $options = '<option value="Elije un municipio">Elije un municipio</option>';
                json.municipios.forEach(el => $options += `<option value="${el.nombre}">${el.nombre}</option>`);
                $selectMunicipalities.innerHTML = $options;
            })
            .catch(err => console.error('Error fetching municipalities:', err));
    }

    function loadCities(municipality) {
        fetch(`https://apis.datos.gob.ar/georef/api/localidades?municipio=${municipality}&campos=id,nombre&max=1000`)
            .then(res => res.ok ? res.json() : Promise.reject(res))
            .then(json => {
                let $options = '<option value="Elije una ciudad">Elije una ciudad</option>';
                json.localidades.forEach(el => $options += `<option value="${el.nombre}">${el.nombre}</option>`);
                $selectCity.innerHTML = $options;
            })
            .catch(err => console.error('Error fetching cities:', err));
    }

    $selectProvinces.addEventListener('change', function() {
        const provinceName = $selectProvinces.value;
        if (provinceName !== "Elije una provincia") {
            loadMunicipalities(provinceName);
        } else {
            $selectMunicipalities.innerHTML = '<option value="Elije un municipio">Elije un municipio</option>';
            $selectCity.innerHTML = '<option value="Elije una ciudad">Elije una ciudad</option>';
        }
    });

    $selectMunicipalities.addEventListener('change', function() {
        const municipalityName = $selectMunicipalities.value;
        if (municipalityName !== "Elije un municipio") {
            loadCities(municipalityName);
        } else {
            $selectCity.innerHTML = '<option value="Elije una ciudad">Elije una ciudad</option>';
        }
    });

    loadProvinces();
});