
/**
 * Account Settings - Account
 */

'use strict';

document.addEventListener('DOMContentLoaded', function (e) {
    (function () {
        const formAccSettings = document.querySelector('#formAccountSettings')


        // Form validation for Add new record








        // CleaveJS validation

        const phoneNumber = document.querySelector('#phoneNumber'),
            zipCode = document.querySelector('#zipCode');
        // Phone Mask
        if (phoneNumber) {
            new Cleave(phoneNumber, {
                phone: true,
                phoneRegionCode: 'US'
            });
        }

        // Pincode
        if (zipCode) {
            new Cleave(zipCode, {
                delimiter: '',
                numeral: true
            });
        }

        // Update/reset user image of account page
        let accountUserImage = document.getElementById('uploadedAvatar');
        const fileInput = document.querySelector('.account-file-input'),
            resetFileInput = document.querySelector('.account-image-reset');

        if (accountUserImage) {
            const resetImage = accountUserImage.src;
            fileInput.onchange = () => {
                if (fileInput.files[0]) {
                    accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
                }
            };
            resetFileInput.onclick = () => {
                fileInput.value = '';
                accountUserImage.src = resetImage;
            };
        }
    })();
});

// Select2 (jquery)

