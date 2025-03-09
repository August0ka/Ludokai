window.BeautifulAlert = {
    fire: function(options) {
        const defaults = {
            title: 'Aviso',
            message: '',
            type: 'success', // success, warning, error
            multipleChoices: false,
            confirmText: 'Sim',
            declineText: 'Não',
            okText: 'OK',
            onConfirm: function() {},
            onDecline: function() {},
            onClose: function() {}
        };
        
        const settings = { ...defaults, ...options };
        
        $('.beautiful-alert').remove();
        
        let buttonHtml = '';
        if (settings.multipleChoices) {
            buttonHtml = `
                <button class="rounded bg-rose-700 hover:bg-rose-600 w-16 transition-transform duration-300 hover:scale-110 mx-4 py-1 mr-0" id="decline_button">${settings.declineText}</button>
                <button class="rounded bg-emerald-700 hover:bg-emerald-600 w-16 transition-transform duration-300 hover:scale-110 mx-4 py-1" id="confirm_button">${settings.confirmText}</button>
            `;
        } else {
            buttonHtml = `
                <button class="rounded bg-sky-600 hover:bg-sky-500 transition-transform duration-300 hover:scale-110 w-16 mx-4 py-1" id="ok_button">${settings.okText}</button>
            `;
        }
        
        let iconHtml = '';
        if (settings.type === 'success') {
            iconHtml = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-28 text-emerald-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            `;
        } else if (settings.type === 'warning') {
            iconHtml = `
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-28 text-yellow-400">
                    <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                </svg>
            `;
        } else if (settings.type === 'error') {
            iconHtml = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-28 text-rose-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            `;
        }
        
        const alertHtml = `
            <div class="fixed inset-0 flex items-center justify-center z-[1000] beautiful-alert bg-black bg-opacity-50">
                <div class="relative w-96 bg-blue-night-950 rounded-2xl shadow-pumpkin-400 shadow-md p-4">
                    <div class="text-center text-gray-100 text-4xl mb-3">${settings.title}</div>
                    <div class="flex flex-col items-center justify-center mb-3">
                        ${iconHtml}
                        <p class="text-gray-100">${settings.message}</p>
                    </div>
                    <div class="flex justify-center text-lg text-gray-100">
                        ${buttonHtml}
                    </div>
                </div>
            </div>
        `;
        
        $('body').append(alertHtml);
        
        if (settings.multipleChoices) {
            $('#confirm_button').on('click', function() {
                $('.beautiful-alert').addClass('hidden');
                settings.onConfirm();
                setTimeout(() => $('.beautiful-alert').remove(), 300);
            });
            
            $('#decline_button').on('click', function() {
                $('.beautiful-alert').addClass('hidden');
                settings.onDecline();
                setTimeout(() => $('.beautiful-alert').remove(), 300);
            });
        } else {
            $('#ok_button').on('click', function() {
                $('.beautiful-alert').addClass('hidden');
                settings.onClose();
                setTimeout(() => $('.beautiful-alert').remove(), 300);
            });
        }
        
        $('.beautiful-alert').on('click', function(event) {
            if (event.target === this) {
                $('.beautiful-alert').addClass('hidden');
                settings.onClose();
                setTimeout(() => $('.beautiful-alert').remove(), 300);
            }
        });
        
        return this;
    },
    
    close: function() {
        $('.beautiful-alert').addClass('hidden');
        setTimeout(() => $('.beautiful-alert').remove(), 300);
        return this;
    }
};