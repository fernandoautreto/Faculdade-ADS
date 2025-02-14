def convertor():
    seg = int(input('Digite um valor em segundos: '))

    horas = seg // 3600
    minutos = (seg % 3600) // 60
    segundos = seg % 60

    print(f'horas: {horas}, minutos: {minutos}, segundos: {segundos}')

def main():
    convertor()
main()