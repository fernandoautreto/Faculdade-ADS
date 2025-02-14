#leia dois vetores (A e B) com cinco posições para números inteiros.
#o programa deve, então, subtrair o primeiro elemento de A do último de B, armazenando o resultado num terceiro vetor, subtrair o segundo elemento de A do penúltimo de B, armazenando o resultado num terceiro vetor e assim por diante.
#ao final, mostre o resultado do terceiro vetor
#O índice de um dos vetores terá que ser decrementado (slide 2 de Vetor) , ou seja, você implementara ele manualmente.

#Não use nenhuma função pronta da linguagem Python, a não ser len() e append().
a = []
b = []
c = []
for i in range(5):
    a.append(int(input('Digite o vetor a: ')))
    b.append(int(input('Digite o vetor b: ')))
print(a)
print(b)
print('O que é len()?', len(a))
posicao = len(a) - 1 # obtem o último índice do vetor
for i in range(len(a)):
    c.append(a[i] - b[posicao])
    posicao = posicao -1
print (c)


a = []
b = []
c = []
for i in range(5):
    a.append(int(input('Digite o vetor a: ')))
    b.append(int(input('Digite o vetor b: ')))
print(a)
print(b)
print('O que é len()?', len(a))
i = 0
#                      início  , parada, decremento
for posicao in range(len(a) - 1,    -1,    -1):
    c.append(a[i] - b[posicao])
    i = i + 1 # incremento
print (c)