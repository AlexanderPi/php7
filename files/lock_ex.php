<?php ## Модель процесса-писателя.
  $file = "file.txt";

  // Вначале создаем пустой файл, ЕСЛИ ЕГО ЕЩЕ НЕТ.
  // Если же файл существует, это его не разрушит.
  fclose(fopen($file, "a+b"));

  // Блокируем файл.
  $f = fopen($file, "r+b") or die("Не могу открыть файл!");
  flock($f, LOCK_EX); // ждем, пока мы не станем единственными

    // . . .
    // В этой точке мы можем быть уверены, что только эта 
    // программа работает с файлом.
    // . . . 

  // Все сделано. Снимаем блокировку.
  fclose($f);
?>