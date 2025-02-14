#insira dez números inteiros em um vetor
#crie um segundo vetor, substituindo os números multiplos de 3 por "999""
#exiba os dois vetores
#Não use nenhuma função pronta da linguagem Python, a não ser len() e append().

vetor1 = []
vetor2 = []

for i in range(4):
    vetor1.append(int(input(f'Digite o {i + 1}º número: ')))

for i in range(len(vetor1)):
    if vetor1[i] % 3 == 0:
        vetor2.append(999)
    if vetor1[i] % 3 != 0:
        vetor2.append(vetor1[i])

print(vetor2)

