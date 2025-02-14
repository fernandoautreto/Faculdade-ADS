pessoas = 1
while pessoas <= 5:
    nome = input(f'Digite o nome da pessoa {pessoas}: ')
    altura = float(input(f'Digite a alttura do(a) {nome}: '))
    if pessoas == 1:
        alto = altura
        nome_alto = nome
        baixo = altura
        nome_baixo = nome
    if altura > alto:
        alto = altura
        nome_alto = nome
    if altura < baixo:
        baixo = altura
        nome_baixo = nome
    pessoas = pessoas + 1
print(f'Nome da pessoa mais alta {nome_alto} e a altura {alto}.')
print(f'Nome da pessoa mais baixa {nome_baixo} e a altura {baixo}')