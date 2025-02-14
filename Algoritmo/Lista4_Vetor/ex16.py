#preencha dois vetores com de dez numeros cada
#preencha um terceiro vetor com os números dos dois vetores anteriores ordenados em ordem crescente

vetor1 = []
vetor2 = []
vetor3 = []
for i in range(4):
    vetor1.append(int(input(f'Digite o {i + 1}º número da primeira lista: ')))

for i in range(4):
    vetor2.append(int(input(f'Digite o {i + 1}º número da segunda lista: ')))
print(f'Lista 1: {vetor1}')
print(f'Lista 2: {vetor2}')

vetor3 = vetor1 + vetor2
print(f'União dos vetores 1 e 2: {vetor3}')

vetor3.sort()
print(f'Ordem crescente do vetor 3: {vetor3}')
