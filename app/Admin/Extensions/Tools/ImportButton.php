<?php


namespace App\Admin\Extensions\Tools;
 
use Encore\Admin\Admin;
use Encore\Admin\Grid\Tools\AbstractTool;

class ImportButton extends AbstractTool
{
    /**
     * @var string CSVインポートのURL生成に使用するパス
     */
    private $path;
 
    /**
     * ImportButton constructor.
     * @param $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }
 
    /**
     * @return string インポートボタンのJavaScript
     */
    private function script()
    {
        return <<<EOT
$('#import-file').on('change', function () {
    var isConfirmed = confirm("Is this OK?");
    if (!isConfirmed) {
        return;
    }
 
    var formData = new FormData();
    formData.append("file", $("#import-file").prop("files")[0]);
    formData.append("_token", LA.token);
 
    // CSVファイルをアップロードする
    $.ajax({
        method: "POST",
        url: "/admin/$this->path/csv/import",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            $.pjax.reload("#pjax-container");
            toastr.success('Upload Successful');
        }
    })
});
EOT;
    }
 
    public function render()
    {
        // インポートボタンのビュー生成
        Admin::script($this->script());
        return view('laravel-admin.tools.import_button');
    }
}