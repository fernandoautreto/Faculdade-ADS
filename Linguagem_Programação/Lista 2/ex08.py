#(Função sem retorno com parâmetro) Faça uma função/método que calcule a média de um aluno que realizou duas provas (P1 e P2), a partir desta média, chame/crie OUTRA função que verifique se esta média aprova ou reprova o aluno.

def media(a, b):
    calculo = (a + b) / 2
    status(calculo)

def status(a):
    
    if a>= 7:
        print('Aprovado')
    else:
        print('Reprovado')
def main():
    p1 = float(input('Digite a nota da P1: '))
    p2 = float(input('Digite a nota da P2: '))
    media(p1, p2)
    

main()
    

    