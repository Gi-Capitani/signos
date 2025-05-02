<?php include('layouts/header.php'); ?>

<?php
// Recebe a data do formulário
$data_nascimento = $_POST['data_nascimento'] ?? '';

// Formata a data para comparar (sem ano)
$dia_mes = date('d/m', strtotime($data_nascimento));

// Carrega o XML
$signos = simplexml_load_file('signos.xml');

// Função para converter dd/mm em timestamp fixo
function dataParaTimestamp($data) {
    return strtotime('2020/' . implode('/', array_reverse(explode('/', $data))));
}

$timestamp_usuario = dataParaTimestamp($dia_mes);
$signo_encontrado = null;

foreach ($signos->signo as $signo) {
    $inicio = dataParaTimestamp($signo->dataInicio);
    $fim = dataParaTimestamp($signo->dataFim);

    // Corrige para signos que atravessam o ano (ex: Capricórnio)
    if ($fim < $inicio) {
        if ($timestamp_usuario >= $inicio || $timestamp_usuario <= $fim) {
            $signo_encontrado = $signo;
            break;
        }
    } else {
        if ($timestamp_usuario >= $inicio && $timestamp_usuario <= $fim) {
            $signo_encontrado = $signo;
            break;
        }
    }
}
?>

<?php if ($signo_encontrado): ?>
    <body style="background-image: url('assets/imgs/<?php echo $signo_encontrado->imagem; ?>');">
        <div class="message-box">
            <h2><?php echo $signo_encontrado->signoNome; ?></h2>
            <p><?php echo $signo_encontrado->descricao; ?></p>
            <a href="index.php" class="btn btn-light mt-3">← Voltar</a>
        </div>
    </body>
<?php else: ?>
    <body style="background-color: #111; color: #fff;">
        <div class="message-box">
            <h2>Signo não encontrado</h2>
            <p>Não foi possível identificar seu signo. Verifique a data inserida.</p>
            <a href="index.php" class="btn btn-light mt-3">← Voltar</a>
        </div>
    </body>
<?php endif; ?>
<?php include('layouts/footer.php'); ?>