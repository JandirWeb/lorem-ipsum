function simular($valor, $risco){
    if($risco == 0){
        $roi = 0.05 * $valor
        console.log($roi)
        document.getElementById('message-text').value = $roi
    }else if($risco == 1){
        $roi = 0.1 * $valor
        console.log($roi)
        document.getElementById('message-text').value = $roi
    }else{
        $roi = 0.2 * $valor
        console.log($roi)
        document.getElementById('message-text').value = $roi
    }
}



