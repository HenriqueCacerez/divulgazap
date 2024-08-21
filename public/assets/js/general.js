const sendRequest = async (method, endpoint, body = null) => {
    try {
        body = body ? JSON.stringify(body) : null;
        
        let headers = {
            'Content-Type':     'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        }
    
        const response = await fetch(endpoint, { method, body, headers });
    
        return response.json();
        
    } catch (error) {
        return error;
    }
}

const openAlert = ({ element, message, color, closeInSeconds = false }) => {

    closeAlert( element );

    element.text(message);
    element.removeClass();
    element.addClass(`alert alert-${color} alert-dismissible text-center`);

    if (closeInSeconds) {
        setTimeout(() => { closeAlert( element ) }, closeInSeconds * 1000);
    }
}

const closeAlert = ( element ) => {
    element.text('');
    element.removeClass();
    element.addClass('d-none');
}