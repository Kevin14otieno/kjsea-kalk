
const scoreInputs = document.querySelectorAll('.score');


scoreInputs.forEach(input => {
    input.addEventListener('focus', () => input.value = '');

    input.addEventListener('keydown', (e) => {
        const currentValue = input.value;

        if(['Backspace','ArrowLeft','ArrowRight','Tab'].includes(e.key)) return;

        
        if(!isNaN(e.key)) {
            const nextValue = currentValue + e.key;
            if(parseInt(nextValue) > 8) e.preventDefault();
        }
    });
});

function calculateScore() {
    let total = 0;
    const scoresData = {}; 

    for (const input of scoreInputs) {
        const val = parseInt(input.value);

    
        if (isNaN(val) || val < 0 || val > 8) {
            alert("Please enter numbers between 0 and 8 for all fields.");
            return;
        }

        total += val;
        scoresData[input.name] = val; 
    }

    let level = '';
    if(total >= 65) level = 'EE1';
    else if(total >= 57) level = 'EE2';
    else if(total >= 49) level = 'ME1';
    else if(total >= 41) level = 'ME2';
    else if(total >= 33) level = 'AE1';
    else if(total >= 25) level = 'AE2';
    else if(total >= 17) level = 'BE1';
    else level = 'BE2';

   
    const eligibleLevels = ['EE1','EE2','ME1','ME2'];
    const scholarship = eligibleLevels.includes(level)
        ? "<br><span style='color:green;font-weight:bold;'>Eligible for JKF Elimu Scholarship 🎓</span>"
        : "<br><span style='color:red;font-weight:bold;'>Not eligible for JKF Elimu Scholarship</span>";

    document.getElementById('result').innerHTML = `Total Score: ${total} / 72 <br>Level: ${level} ${scholarship}`;

    
    fetch('save_catche.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(scoresData)
    });
}
function startScan() {
    document.getElementById('cameraInput').click();
}

document.getElementById('cameraInput').addEventListener('change', function () {
    const image = this.files[0];
    if (!image) return;

    Tesseract.recognize(image, 'eng')
        .then(({ data: { text } }) => {
            console.log(text);
            fillScoresFromText(text);
        });
});

function fillScoresFromText(text) {
    const mappings = {
        mathematics: /mathematics\s*[:\-]?\s*(\d)/i,
        english: /english\s*[:\-]?\s*(\d)/i,
        kiswahili: /kiswahili\s*[:\-]?\s*(\d)/i,
        integrated_science: /integrated science\s*[:\-]?\s*(\d)/i,
        social_studies: /social studies\s*[:\-]?\s*(\d)/i,
        religious_education: /religious education\s*[:\-]?\s*(\d)/i,
        creative_arts: /creative arts\s*[:\-]?\s*(\d)/i,
        physical_education: /physical education\s*[:\-]?\s*(\d)/i,
        life_skills: /life skills\s*[:\-]?\s*(\d)/i
    };

    scoreInputs.forEach(input => {
        const regex = mappings[input.name];
        if (regex) {
            const match = text.match(regex);
            if (match) {
                input.value = match[1];
            }
        }
    });

    updateLivePreview(); // reuse your existing logic
}
