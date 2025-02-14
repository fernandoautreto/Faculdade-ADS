#carregue dois vetores com 10 números cada
#faça a multiplicação dos números na mesma posição
#o resultado deverá ser adicionada em um terceiro vetor
#Não use nenhuma função pronta da linguagem Python, a não ser len() e append().

vetor1 = []
vetor2 = []
vetor3 = []

for i in range(5):
    vetor1.append(int(input(f'Digite o {i + 1}º número da primeira lista: ')))

for i in range(5):
    vetor2.append(int(input(f'Digite o {i + 1}º número da segunda lista: ')))

print(f'Vetor 1: {vetor1}')
print(f'Vetor 2: {vetor2}')

for i in range(len(vetor1 and vetor2)):
    vetor3.append(vetor1[i] * vetor2[i])


print(f'Multiplicação dos vetores: {vetor3}')
