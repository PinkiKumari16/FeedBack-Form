<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🔐Login Form</title>
    <link rel='stylesheet' href='style.css'></link>
</head>
<body>
    <?php if (!isset($_COOKIE['form_submitted'])): ?>
        <!-- Login Form -->
        <Form action="/Login Form/data.php" method="post" class='form'>
            <h1>🔐 Login 🔐</h1>

            <!-- Email Input -->
            <div class="inputContainer">
                <label>Email: </label><input type="email" name='email' required><br>
            </div>

            <!-- Name Input -->
            <div class="inputContainer">
                <label>Name: </label><input type="text" name='name' required><br>
            </div>

            <!-- Country Selection -->
            <div class="inputContainer" id="country-code">
                <label>Select Country: </label>
                <div class="countryBox">
                    <select name="country" id="countrySelect"></select>
                    <img src="https://flagsapi.com/IN/flat/64.png" alt="country flag" height='20px'>
                </div>
            </div>
            
            <!-- Rating Input -->
            <div class="inputContainer" id="country-code">
                <label>Rate the website experience (1-10):</label>
            </div>
            <div class="rating">
                <input type="radio" name="rating" value="1" required>
                <input type="radio" name="rating" value="2" required>
                <input type="radio" name="rating" value="3" required>
                <input type="radio" name="rating" value="4" required>
                <input type="radio" name="rating" value="5" required>
                <input type="radio" name="rating" value="6" required>
                <input type="radio" name="rating" value="7" required>
                <input type="radio" name="rating" value="8" required>
                <input type="radio" name="rating" value="9" required>
                <input type="radio" name="rating" value="10" required>
            </div>

            <!-- Submit Button -->
            <button type='submit' class='loginButton'>Login</button>
        </Form>
    <?php else: ?>
        <h3 class='submitted-massage'>You have already submitted the form.</h3>
    <?php endif; ?>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // Fetch the list of countries from the server
            fetch('countryNameList.php')
                .then(response => response.json()) // Parse the JSON response
                .then(data => {
                    const countrySelect = document.getElementById('countrySelect');
                    // Clear the existing options
                    countrySelect.innerHTML = '';   
                    // Iterate over the country data and create option elements   
                    for (const [code, name] of Object.entries(data)) {
                        const option = document.createElement('option');

                        // Set India as the default selected option
                        if(code ==='IN'){
                            option.selected = 'true';
                        }
                        option.value = name;
                        option.id = code;
                        option.textContent = name;
                        countrySelect.appendChild(option);
                    }
                })
                .catch(error => console.error('Error fetching country data:', error));
        });

        // Update the flag based on selected country
        const updateFlag = (element)=>{
            let selectedOption = element.options[element.selectedIndex];
            let code = selectedOption.id;
            const img = document.querySelector('.countryBox img');
            // console.log(code);

            // Update the flag image source based on the selected country code
            img.src = `https://flagsapi.com/${code}/flat/64.png` 
        }

        // Event listener for country selection change
        let select = document.querySelector('select');
        select.addEventListener("change",(event)=>{
            // Update the flag when the selected country changes
            updateFlag(event.target)
        }); 
    </script>

</body>
</html>

