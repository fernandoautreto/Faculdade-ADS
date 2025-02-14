altura = []
idade = []
soma_altura = 0
total_idade = 0
for i in range(3):
    altura.append(float(input('Digite a altura: ')))
    idade.append(int(input('Digite a idade: ')))
    soma_altura += altura[i]

for i in range(3):
    if idade[i] > 25:
        total_idade += 1
        print(idade[i], 'anos e seu índice', i)
media_altura = soma_altura / len(altura)
print(f'A média de altura dessa sala foi de {media_altura:.2f} metros.')

