#9. (Função sem retorno sem parâmetro) Faça uma função/método que leia cinco valores inteiros, determine e mostre o maior e o menor deles. Não pode usar vetor e função pronta da linguagem Python.

def decisao():

    for i in range(5):
        n = int(input('Digite um número: '))
        if i == 0:
            maior = menor = n
        if n >= maior:
            maior = n
        if n <= menor:
            menor = n
    print(maior, menor)

def main():
    decisao()

main()
    
