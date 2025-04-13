function showPopup(name, desc, mrp, location, count) {
    document.getElementById('popupContent').innerHTML = `
        <h3>${name}</h3>
        <p>${desc}</p>
        <p>MRP: ₹${mrp}</p>
        <p>Location: <a href="${location}" target="_blank">Google Maps</a></p>
  
        <span class="popup-close" onclick="hidePopup()">X</span>
    `;
    document.getElementById('popupBox').style.display = 'block';
}

function hidePopup() {
    document.getElementById('popupBox').style.display = 'none';
}
