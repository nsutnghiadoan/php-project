function animateNumber(finalNumber, duration = 5000, startNumber = 0, callback) {
    let currentNumber = startNumber
    const interval = window.setInterval(updateNumber, 10)
    function updateNumber() {
        if (currentNumber >= finalNumber) {
            clearInterval(interval)
        } else {
            let inc = Math.ceil(finalNumber / (duration / 10))
            if (currentNumber + inc > finalNumber) {
                currentNumber = finalNumber
                clearInterval(interval)
            } else {
                currentNumber += inc
            }
            callback(currentNumber)
        }
    }
}

document.addEventListener('DOMContentLoaded', function () {
    animateNumber(1730, 3000, 0, function (number) {
        const formattedNumber = number.toLocaleString()
        document.getElementById('done-deal').innerText = formattedNumber
    })

    animateNumber(9, 3000, 0, function (number) {
        const formattedNumber = number.toLocaleString()
        document.getElementById('new-cus').innerText = formattedNumber
    })

    animateNumber(39, 3000, 0, function (number) {
        const formattedNumber = number.toLocaleString()
        document.getElementById('potential-cus').innerText = formattedNumber
    })
    animateNumber(8, 3000, 0, function (number) {
        const formattedNumber = number.toLocaleString()
        document.getElementById('block-cus').innerText = formattedNumber
    })
});

