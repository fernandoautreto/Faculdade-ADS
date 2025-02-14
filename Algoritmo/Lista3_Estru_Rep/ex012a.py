pessoas = 1
total_altura = 0
total_pessoa = 0
while pessoas <= 20:
    idade = int(input(f'Digite a idade da pessoa {pessoas}: '))
    altura = float(input(f'Digite a altura da pessoa (m) {pessoas}: '))
    if idade > 20:
        total_altura = total_altura + altura
        total_pessoa = total_pessoa + 1
    pessoas = pessoas + 1
if total_pessoa > 0:
    media_altura = total_altura / total_pessoa
    print(f"O total de pessoas maiores de 20 anos é {total_pessoa} pessoas, e a média de alturas das pessoas com mais de 20 anos é {media_altura:.2f} metros.")
else:
    print("Não há pessoas com mais de 20 anos para calcular a média de altura.")

