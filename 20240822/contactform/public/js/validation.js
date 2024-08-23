$(document).ready(function() {
    $('#contactForm').submit(function(event) {
        let isValid = true;

        $('.error-message').remove();


        const name = $('#name').val().trim();
        if (name === '') {
            $('#name').after('<p class="error-message" style="color: red;">氏名を入力してください。</p>');
            isValid = false;
        } else if (name.length > 10) {
            $('#name').after('<p class="error-message" style="color: red;">氏名は10文字以内です。</p>');
            isValid = false;
        }


        const kana = $('#kana').val().trim();
        if (kana === '') {
            $('#kana').after('<p class="error-message" style="color: red;">フリガナを入力してください。</p>');
            isValid = false;
        } else if (kana.length > 10) {
            $('#kana').after('<p class="error-message" style="color: red;">フリガナは10文字以内です。</p>');
            isValid = false;
        }


        const tel = $('#tel').val().trim();
        if (tel.length > 11) {
            $('#tel').after('<p class="error-message" style="color: red;">電話番号は11文字以内で入力してください。</p>');
            isValid = false;
        } else if (tel !== '' && !/^\d+$/.test(tel)) {
            $('#tel').after('<p class="error-message" style="color: red;">電話番号は数字で入力してください。</p>');
            isValid = false;
        }


        const email = $('#email').val().trim();
        if (email === '') {
            $('#email').after('<p class="error-message" style="color: red;">メールアドレスを入力してください。</p>');
            isValid = false;
        } else if (!/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email)) {
            $('#email').after('<p class="error-message" style="color: red;">メールアドレスには「@」を含む形式で入力してください。</p>');
            isValid = false;
        }


        const body = $('#body').val().trim();
        if (body === '') {
            $('#body').after('<p class="error-message" style="color: red;">お問い合わせ内容は必須入力です。</p>');
            isValid = false;
        }
        
        if (!isValid) {
            event.preventDefault();
        }
    });

    $('#editForm').submit(function(event) {
        let isValid = true;

        $('.error-message').remove();

        const name = $('#name').val().trim();
        if (name === '') {
            $('#name').after('<p class="error-message" style="color: red;">氏名を入力してください。</p>');
            isValid = false;
        } else if (name.length > 10) {
            $('#name').after('<p class="error-message" style="color: red;">氏名は10文字以内です。</p>');
            isValid = false;
        }

        const kana = $('#kana').val().trim();
        if (kana === '') {
            $('#kana').after('<p class="error-message" style="color: red;">フリガナを入力してください。</p>');
            isValid = false;
        } else if (kana.length > 10) {
            $('#kana').after('<p class="error-message" style="color: red;">フリガナは10文字以内です。</p>');
            isValid = false;
        }

        const tel = $('#tel').val().trim();
        if (tel.length > 11) {
            $('#tel').after('<p class="error-message" style="color: red;">電話番号は11文字以内で入力してください。</p>');
            isValid = false;
        } else if (tel !== '' && !/^\d+$/.test(tel)) {
            $('#tel').after('<p class="error-message" style="color: red;">電話番号は数字で入力してください。</p>');
            isValid = false;
        }

        const email = $('#email').val().trim();
        if (email === '') {
            $('#email').after('<p class="error-message" style="color: red;">メールアドレスを入力してください。</p>');
            isValid = false;
        } else if (!/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email)) {
            $('#email').after('<p class="error-message" style="color: red;">メールアドレスには「@」を含む形式で入力してください。</p>');
            isValid = false;
        }

        const body = $('#body').val().trim();
        if (body === '') {
            $('#body').after('<p class="error-message" style="color: red;">お問い合わせ内容は必須入力です。</p>');
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
});
