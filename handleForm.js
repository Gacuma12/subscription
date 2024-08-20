const fetch = require('node-fetch');

exports.handler = async function(event, context) {
    if (event.httpMethod === 'POST') {
        const formData = JSON.parse(event.body);
        
        try {
            const response = await fetch('https://formspree.io/f/meojlvzd', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            if (response.ok) {
                return {
                    statusCode: 200,
                    body: JSON.stringify({ message: 'Success' })
                };
            } else {
                return {
                    statusCode: response.status,
                    body: JSON.stringify({ message: 'Failure' })
                };
            }
        } catch (error) {
            return {
                statusCode: 500,
                body: JSON.stringify({ message: 'Error' })
            };
        }
    }

    return {
        statusCode: 405,
        body: JSON.stringify({ message: 'Method Not Allowed' })
    };
};
