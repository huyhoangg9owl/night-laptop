export default function Product() {
    CKEditor();
    VoteStar();
    Quantity();
}

function CKEditor() {
    ClassicEditor
        .create(document.querySelector('#review'), {
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'outdent',
                    'indent',
                    '|',
                    'blockQuote',
                    'undo',
                    'redo'
                ]
            },
            language: 'vi',
        })
}

function VoteStar() {
    const stars = document.querySelectorAll('[data-name="star-rate"]');
    stars.forEach((star, index) => {
        star.addEventListener('click', () => {
            stars.forEach((el, i) => {
                const icon = el.querySelector('svg');
                if (i <= index) {
                    icon.classList.add('fill-yellow-400');
                    icon.classList.remove('fill-gray-400');
                } else {
                    icon.classList.remove('fill-yellow-400');
                    icon.classList.add('fill-gray-400');
                }
            });
        });
    });
}

function Quantity() {
    const group = document.querySelector('[data-group="quantity"]');
    
    const input = group.querySelector('input');
    
    const plus = group.querySelector('[data-action="plus"]');
    const minus = group.querySelector('[data-action="minus"]');

    let quantity = parseInt(input.value ?? "1");

    plus.addEventListener('click', () => {
        input.value = `${quantity + 1}`;
        quantity = parseInt(input.value);
    });
    
    minus.addEventListener('click', () => {
        if (quantity > 1) {
            input.value = `${quantity - 1}`;
            quantity = parseInt(input.value);
        }
    });

    input.addEventListener('input', (evt: Event) => {
        const target = evt.target as HTMLInputElement;
        
        if (target.value === '' || parseInt(target.value) < 1) {
            target.value = '1';
        }
        const value = parseInt(target.value);
        quantity = value;
    });
}