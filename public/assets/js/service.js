// Learn more functions for service details
function showService1Details() {
    document.getElementById('brandingDesign').classList.remove('service-details-hidden');
    document.getElementById('printDesign').classList.add('service-details-hidden');
    document.getElementById('labelDesign').classList.add('service-details-hidden');
    document.getElementById('webdev').classList.add('service-details-hidden');
}

function showService2Details() {
    document.getElementById('printDesign').classList.remove('service-details-hidden');
    document.getElementById('brandingDesign').classList.add('service-details-hidden');
    document.getElementById('labelDesign').classList.add('service-details-hidden');
    document.getElementById('webdev').classList.add('service-details-hidden');
}

function showService3Details() {
    document.getElementById('labelDesign').classList.remove('service-details-hidden');
    document.getElementById('brandingDesign').classList.add('service-details-hidden');
    document.getElementById('printDesign').classList.add('service-details-hidden');
    document.getElementById('webdev').classList.add('service-details-hidden');
}

function showService4Details() {
    document.getElementById('webdev').classList.remove('service-details-hidden');
    document.getElementById('brandingDesign').classList.add('service-details-hidden');
    document.getElementById('printDesign').classList.add('service-details-hidden');
    document.getElementById('labelDesign').classList.add('service-details-hidden');
}