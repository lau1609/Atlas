
<!DOCTYPE html>
 <html>
     <head>
        <!-- En el <head> de tu HTML -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>

         <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script> -->
         

     </head>
     <body>
     <div style="max-width: 800px; margin: auto;">
        <div style="text-align: center; margin-bottom: 10px;">
            <button id="prevPage">⬅ Anterior</button>
            <span>Página: <span id="page_num">1</span> / <span id="page_count">--</span></span>
            <button id="nextPage">Siguiente ➡</button>
            &nbsp; | &nbsp;
            <button id="zoomOut">➖ Zoom</button>
            <button id="zoomIn">➕ Zoom</button>
        </div>

        <div id="pdf-container" style="border: 1px solid #ccc; height: 600px; overflow: auto; text-align: center;">
            <canvas id="pdf-viewer"></canvas>
        </div>
    </div>

     </body>
 </html>


 <script>
    console.log(document.location.origin);
  const url = document.location.origin+'/atlas/administrador/_pdf/manual.pdf';

  const pdfjsLib = window['pdfjs-dist/build/pdf'];
  pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

  let pdfDoc = null,
      pageNum = 1,
      scale = 1.5,
      canvas = document.getElementById('pdf-viewer'),
      ctx = canvas.getContext('2d');

  function renderPage(num) {
    pdfDoc.getPage(num).then(function(page) {
      let viewport = page.getViewport({ scale: scale });
      canvas.height = viewport.height;
      canvas.width = viewport.width;

      let renderContext = {
        canvasContext: ctx,
        viewport: viewport
      };
      page.render(renderContext);

      document.getElementById('page_num').textContent = num;
    });
  }

  function queueRenderPage(num) {
    if (num >= 1 && num <= pdfDoc.numPages) {
      pageNum = num;
      renderPage(pageNum);
    }
  }

  function zoom(factor) {
    scale += factor;
    if (scale < 0.5) scale = 0.5;
    if (scale > 4) scale = 4;
    renderPage(pageNum);
  }

  // Carga el documento
  pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
    pdfDoc = pdfDoc_;
    document.getElementById('page_count').textContent = pdfDoc.numPages;
    renderPage(pageNum);
  });

  // Botones
  document.getElementById('prevPage').addEventListener('click', function() {
    if (pageNum <= 1) return;
    queueRenderPage(pageNum - 1);
  });

  document.getElementById('nextPage').addEventListener('click', function() {
    if (pageNum >= pdfDoc.numPages) return;
    queueRenderPage(pageNum + 1);
  });

  document.getElementById('zoomIn').addEventListener('click', function() {
    zoom(0.25);
  });

  document.getElementById('zoomOut').addEventListener('click', function() {
    zoom(-0.25);
  });
</script>