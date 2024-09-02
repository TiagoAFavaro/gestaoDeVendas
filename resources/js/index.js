const Chart = require('chart.js/auto');

// Seu código JavaScript para inicializar gráficos ou outras funcionalidades


// Seleciona todos os botões de dropdown
var dropdownButtons = document.querySelectorAll('.nav-link[data-bs-toggle="collapse"]');

// Itera sobre cada botão de dropdown
dropdownButtons.forEach(function (button) {
    // Adiciona um evento de clique a cada botão
    button.addEventListener('click', function () {
        // Seleciona a seta dentro do botão clicado
        var seta = this.querySelector('.seta img');

        // Verifica se o dropdown está aberto
        var dropdownAberto = this.getAttribute('aria-expanded') === 'true';

        // Se o dropdown estiver aberto, não rotaciona a seta; caso contrário, rotaciona
        if (!dropdownAberto) {
            seta.classList.remove('rotacionar');
        } else {
            seta.classList.add('rotacionar');
        }
    });
});

// Função para formatar o número de telefone conforme o usuário digita
document.getElementById('cpf').addEventListener('input', function (e) {
    var cpf = e.target.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    
    if (cpf.length > 3) {
        cpf = cpf.substring(0, 3) + '.' + cpf.substring(3);
    }
    if (cpf.length > 7) {
        cpf = cpf.substring(0, 7) + '.' + cpf.substring(7);
    }
    if (cpf.length > 11) {
        cpf = cpf.substring(0, 11) + '-' + cpf.substring(11, 13);
    }
    
    e.target.value = cpf;
});


document.getElementById('tel').addEventListener('input', function (e) {
    var tel = e.target.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    tel = tel.replace(/(\d{2})(\d)/, '($1) $2'); // Adiciona parênteses após os 2 primeiros dígitos
    tel = tel.replace(/(\d{5})(\d)/, '$1-$2'); // Adiciona hífen após os próximos 5 dígitos
    e.target.value = tel;
});

// Função para remover formatação antes de enviar para o banco de dados
function enviarParaBancoDeDados() {
    var telefoneSemFormatacao = document.getElementById('tel').value.replace(/\D/g, ''); // Remove caracteres não numéricos
    // Aqui você pode enviar telefoneSemFormatacao para o seu servidor
    console.log("Telefone sem formatação:", telefoneSemFormatacao);
}

document.getElementById('cep').addEventListener('input', function (e) {
    var cep = e.target.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    cep = cep.replace(/^(\d{5})(\d)/, '$1-$2'); // Adiciona hífen após os primeiros 5 dígitos
    e.target.value = cep;
});

document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM totalmente carregado.');
    var toggleSidebarButton = document.getElementById('toggleSidebar');
    var sidebar = document.getElementById('sidebar01');

    toggleSidebarButton.addEventListener('click', function () {
        sidebar.classList.toggle('hidden-sidebar');
    });
});

document.getElementById('addRowButton').addEventListener('click', function() {
    var table = document.getElementById('vendasTable').getElementsByTagName('tbody')[0];
    var newRow = table.insertRow();

    var cells = ['produto', 'detalhes', 'quantidade', 'valor', 'subtotal'];
    cells.forEach(function(cell) {
        var newCell = newRow.insertCell();
        var input;
        if (cell === 'detalhes') {
            input = document.createElement('textarea');
            input.id = cell;
            input.name = cell;
            input.required = true;
            input.style.height = '30px';  // Match the height of other inputs
        } else {
            input = document.createElement('input');
            input.type = cell === 'quantidade' || cell === 'valor' || cell === 'subtotal' ? 'number' : 'text';
            input.id = cell;
            input.name = cell;
            input.required = cell !== 'desconto';
            input.step = cell === 'valor' || cell === 'subtotal' ? '0.01' : undefined;
        }
        input.style.width = '100%';
        input.style.height = '30px';
        input.style.borderRadius = '5px';
        input.style.border = '1px solid rgb(211, 205, 205)';
        input.style.boxSizing = 'border-box';
        newCell.appendChild(input);
    });

    // Adiciona o botão de cadastrar na nova linha
    var actionCell = newRow.insertCell();
    var submitButton = document.createElement('button');
    submitButton.type = 'submit';
    submitButton.innerText = 'CADASTRAR';
    actionCell.appendChild(submitButton);
});
