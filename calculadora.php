<?php
    // Definir funciones de conversión
    function onzas_a_gramos($onzas) {
        return $onzas * 28.3495;
    }

    function libras_a_gramos($libras) {
        return $libras * 453.592;
    }

    // Procesar la conversión si se envió el formulario
    $resultado_onzas = $resultado_libras = "";
    if (isset($_POST['convertir_onzas'])) {
        $onzas = $_POST['onzas'];
        $resultado_onzas = onzas_a_gramos($onzas);
    }
    if (isset($_POST['convertir_libras'])) {
        $libras = $_POST['libras'];
        $resultado_libras = libras_a_gramos($libras);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Conversiones</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Calculadora de Conversiones</h1>

        <!-- Conversión de onzas a gramos -->
        <form method="POST">
            <label for="onzas">Ingresa la cantidad en onzas:</label>
            <input type="number" name="onzas" id="onzas" step="any" required>
            <input type="submit" name="convertir_onzas" value="Convertir a Gramos">
        </form>

        <?php if ($resultado_onzas !== ""): ?>
            <p><?php echo $_POST['onzas']; ?> onzas son <?php echo $resultado_onzas; ?> gramos.</p>
        <?php endif; ?>

        <hr>

        <!-- Conversión de libras a gramos -->
        <form method="POST">
            <label for="libras">Ingresa la cantidad en libras:</label>
            <input type="number" name="libras" id="libras" step="any" required>
            <input type="submit" name="convertir_libras" value="Convertir a Gramos">
        </form>

        <?php if ($resultado_libras !== ""): ?>
            <p><?php echo $_POST['libras']; ?> libras son <?php echo $resultado_libras; ?> gramos.</p>
        <?php endif; ?>

        <br><br>
        <a href="index.html">Volver al Menú Principal</a>
    </div>
</body>
</html>
