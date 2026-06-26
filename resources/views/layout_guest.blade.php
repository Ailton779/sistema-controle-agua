<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Água</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f4f4; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .container { background: white; padding: 32px; border-radius: 8px; width: 100%; max-width: 400px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        input { width: 100%; padding: 8px; margin: 6px 0 14px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { background: #1a73e8; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        label { font-weight: bold; }
        .sucesso { background: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 16px; }
        .erro { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 16px; }
    </style>
</head>
<body>
<div class="container">
    @if(session('sucesso'))
        <div class="sucesso">{{ session('sucesso') }}</div>
    @endif
    @if($errors->any())
        <div class="erro">
            @foreach($errors->all() as $erro)
                <div>{{ $erro }}</div>
            @endforeach
        </div>
    @endif
    @yield('content')
</div>
</body>
</html>
