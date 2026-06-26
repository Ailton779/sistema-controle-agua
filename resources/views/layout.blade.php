<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Água</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f4f4; }
        nav { background: #1a73e8; padding: 12px 24px; display: flex; justify-content: space-between; align-items: center; }
        nav a { color: white; margin-right: 20px; text-decoration: none; font-weight: bold; }
        nav form button { background: transparent; border: 1px solid white; color: white; padding: 6px 14px; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .container { max-width: 900px; margin: 30px auto; background: white; padding: 24px; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background: #1a73e8; color: white; }
        input, select { width: 100%; padding: 8px; margin: 6px 0 14px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button, .btn { background: #1a73e8; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; }
        .btn-green { background: #34a853; }
        .btn-sm { padding: 4px 10px; font-size: 12px; }
        .sucesso { background: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 16px; }
        .erro { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 16px; }
        label { font-weight: bold; }
    </style>
</head>
<body>
<nav>
    <div>
        @auth
            @if(auth()->user()->role === 'admin')
                <a href="/consumidores">Consumidores</a>
                <a href="/faturas">Faturas</a>
                <a href="/configuracao">Configuração</a>
            @endif
            <a href="/leituras/create">Nova Leitura</a>
        @endauth
    </div>
    <div>
        @auth
        <span style="color:white; margin-right:16px">{{ auth()->user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit">Sair</button>
        </form>
        @endauth
    </div>
</nav>
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
